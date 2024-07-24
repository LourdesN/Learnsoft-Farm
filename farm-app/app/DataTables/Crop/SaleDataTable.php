<?php

namespace App\DataTables\Crop;

use App\Models\Crop\Sale;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class SaleDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'crop.sales.datatables_actions')
            ->editColumn('quantity', function ($row) {
                return $row->quantity . ' Kg';
            })
            ->editColumn('price_per_unit', function ($row) {
                return 'Kshs ' . number_format($row->price_per_unit, 2);
            })
            ->editColumn('total_price', function ($row) {
                return 'Kshs ' . number_format($row->total_price, 2);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Crop\Sale $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Sale $model)
    {
        return $model->newQuery()
            ->join('customers', 'sales.customer_id', '=', 'customers.id')
            ->join('harvests', 'sales.harvest_id', '=', 'harvests.id')
            ->join('crops', 'harvests.crop_id', '=', 'crops.id')
            ->select('sales.*', 'customers.full_name as customer_name', 'crops.name as crop_name');
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
            'crop_name' => ['title' => 'Crop Name'],
            'sales_date' => ['title' => 'Sales Date'],
            'quantity' => ['title' => 'Quantity'],
            'price_per_unit' => ['title' => 'Price Per Unit'],
            'total_price' => ['title' => 'Total Price'],
            'customer_name' => ['title' => 'Customer Name']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'sales_datatable_' . time();
    }
}


