<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Collection;

class DataTableManager
{
    const RESULTS_LIMIT = 30;
    private $resultsLimit;
    private $query;
    private $params;
    private $columns;

    private function __construct($query, $params, $columns, $resultsLimit = self::RESULTS_LIMIT)
    {
        $this->query = $query;
        $this->params = self::collectDeep($params);
        $this->columns = collect($columns);
        $this->resultsLimit = $resultsLimit;
    }

    public static function collectDeep($array)
    {

        if (is_array($array)) {
            $array = collect($array);
            foreach ($array as $key => $value) {
                $array[$key] = $value;
            }
        }

        return $array;
    }

    public static function getInstance($query, $params, $columns, $resultsLimit = self::RESULTS_LIMIT)
    {
        return new self($query, $params, $columns, $resultsLimit);
    }

    public function getQuery()
    {
        if ($this->params) {
            $this->filterQuery();
        }
        return $this->query->paginate($this->resultsLimit);
    }

    private function filterQuery()
    {
        $filters = $this->getFilterColumns();
            if ( count($filters) > 0) {
                $this->searchByColumn( $filters );
            }
        if (count($this->params) > 0) {
            $this->orderBy();
        }
    }

    private function getFilterColumns()
    {
        $filtered = $this->params->filter(function ($param) {
            return $param || $param == '0';
        });

        return $filtered->intersectByKeys($this->columns);
    }

    private function searchByColumn($filters)
    {
        foreach ($filters as $key => $value) {
            $column = $this->columns[$key];
                if (isset($column['filter'])) {
                    $column = $column['filter'];
                }
                    $this->query->where($column, 'like', '%' . $value . '%');
            }
    }


    private function orderBy()
    {
        $column = $this->columns->get($this->params->get('sortBy'));
        if ($column) {
            $direction = $this->params->get('sortDir') === 'ASC' ? 'ASC' : 'DESC';
            $columnName =  $column;
                $this->query->orderBy($columnName, $direction);

        }
    }
}
