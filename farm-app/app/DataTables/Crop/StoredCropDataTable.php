<?php

namespace App\DataTables\Crop;

use App\Models\Crop\StoredCrop;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class StoredCropDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'crop.stored_crops.datatables_actions')
        ->editColumn('quantity', function ($row) {
            return $row->quantity . ' Kg';
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StoredCrop $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(StoredCrop $model)
    {
        return $model->newQuery()
            ->join('crops', 'stored_crops.crop_id', '=', 'crops.id')
            ->join('storages', 'stored_crops.storage_id', '=', 'storages.id')
            ->select('stored_crops.*', 'crops.name as crop_name', 'storages.location as storage_location');
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
            'crop_name' => ['title' => 'Crop Name'],
            'quantity',
            'storage_date',
            'storage_location' => ['title' => 'Storage Location'],
            'harvest_id'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'stored_crops_datatable_' . time();
    }
}

