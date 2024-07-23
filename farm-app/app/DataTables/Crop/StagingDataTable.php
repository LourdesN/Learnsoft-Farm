<?php

namespace App\DataTables\Crop;

use App\Models\Crop\Staging;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class StagingDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'crop.stagings.datatables_actions')
            ->editColumn('quantity', function ($row) {
                return $row->quantity . ' Kg';
            })
            ->editColumn('crop_name', function ($row) {
                return $row->crop->name;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Staging $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Staging $model)
    {
        return $model->newQuery()
            ->join('crops', 'staging.crop_id', '=', 'crops.id')
            ->select('staging.*', 'crops.name as crop_name');
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
            'crop_name' => ['title' => 'Crop Name', 'data' => 'crop_name'],
            'quantity',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'stagings_datatable_' . time();
    }
}

