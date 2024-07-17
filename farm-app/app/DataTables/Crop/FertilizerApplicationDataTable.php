<?php

namespace App\DataTables\Crop;

use App\Models\Crop\FertilizerApplication;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class FertilizerApplicationDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'crop.fertilizer_applications.datatables_actions')
            ->editColumn('quantity', function ($row) {
                return $row->quantity . ' Kg';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Crop\FertilizerApplication $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(FertilizerApplication $model)
    {
        return $model->newQuery()
            ->join('stocks', 'fertilizer_applications.stock_id', '=', 'stocks.id')
            ->select('fertilizer_applications.*', 'stocks.name as stock_name');
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
            'stock_name' => ['title' => 'Stock Name'],
            'application_date',
            'quantity'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'fertilizer_applications_datatable_' . time();
    }
}

