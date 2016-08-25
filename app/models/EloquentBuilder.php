<?php

class EloquentBuilder extends \Illuminate\Database\Eloquent\Builder
{
    /**
     * Eager load pivot relations.
     *
     * @param  array $models
     * @return void
     */
    protected function loadPivotRelations($models)
    {
        $query = head($models)->pivot->newQuery()->with('unit');
        $pivots = array_pluck($models, 'pivot');
        $pivots = head($pivots)->newCollection($pivots);

        $pivots->load($this->getPivotRelations());
    }

    /**
     * Get the pivot relations to be eager loaded.
     *
     * @return array
     */
    protected function getPivotRelations()
    {
        $relations = array_filter(array_keys($this->eagerLoad), function ($relation) {
            return $relation != 'pivot';
        });

        return array_map(function ($relation) {
            return substr($relation, strlen('pivot.'));
        }, $relations);
    }

    /**
     * Override. Eager load relations of pivot models.
     * Eagerly load the relationship on a set of models.
     *
     * @param  array     $models
     * @param  string    $name
     * @param  \Closure  $constraints
     * @return array
     */
    protected function loadRelation(array $models, $name, Closure $constraints)
    {
        // In this part, if the relation name is 'pivot',
        // therefore there are relations in a pivot to be eager loaded.
        if ($name === 'pivot') {
            $this->loadPivotRelations($models);
            return $models;
        }

        // First we will "back up" the existing where conditions on the query so we can
        // add our eager constraints. Then we will merge the wheres that were on the
        // query back to it in order that any where conditions might be specified.
        $relation = $this->getRelation($name);

        $relation->addEagerConstraints($models);

        call_user_func($constraints, $relation);

        $models = $relation->initRelation($models, $name);

        // Once we have the results, we just match those back up to their parent models
        // using the relationship instance. Then we just return the finished arrays
        // of models which have been eagerly hydrated and are readied for return.
        $results = $relation->getEager();

        return $relation->match($models, $results, $name);
    }
}
