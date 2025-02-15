<?php

namespace App\DataTables\Crop;

use App\Models\Crop\Stock;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class StockDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'crop.stocks.datatables_actions')
            ->editColumn('quantity', function ($row) {
                return $row->quantity . ' Kg';
            })
            ->editColumn('remaining_stock', function ($row) {
                return $row->remaining_stock . ' Kg';
            })
            ->editColumn('price', function ($row) {
                return 'Kshs ' . number_format($row->price, 2);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Crop\Stock $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Stock $model)
    {
        return $model->newQuery()
            ->join('suppliers', 'stocks.supplier_id', '=', 'suppliers.id')
            ->select('stocks.*', 'suppliers.name as supplier_name');
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
                    // ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
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
            'quantity',
            'stock_type',
            'price',
            'supplier_name' => ['title' => 'Supplier Name'],
            'remaining_stock'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'stocks_datatable_' . time();
    }
}

