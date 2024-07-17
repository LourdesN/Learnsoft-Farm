<?php

namespace App\DataTables\Crop;

use App\Models\Crop\Crop;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CropDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'crop.crops.datatables_actions')
                         ->addColumn('crop_category_name', function($row) {
                             return $row->crop_category_name;
                         });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Crop $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Crop $model)
    {
        return $model->newQuery()
                     ->join('crop_categories', 'crops.crop_categories_id', '=', 'crop_categories.id')
                     ->select('crops.*', 'crop_categories.name as crop_category_name');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    // Enable Buttons as per your need
//                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'name',
            'crop_category_name' => ['name' => 'Crop Category'],
            'planting_date',
            'harvesting_date'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'crops_datatable_' . time();
    }
}

