<?php

namespace App\Exports;

use App\Models\Saved_styles;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromCollection, WithHeadings
{
    protected $id;

    function __construct($id) {
        $this->id = $id;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = DB::table('saved_styles as s')
        ->select('u.email', 'm.title as model', 'pm.name', 'sc.color_title', 'pl.title', 's.client_folder', 's.end_date','s.created_at')
        ->leftJoin('users as u', 'u.id', '=', 's.user_id')   
        ->leftJoin('models as m', 'm.id', '=', 's.models_id')   
        ->leftJoin('preferred_models as pm', 'pm.id', '=', 's.preferred_models_id')   
        ->leftJoin('style_colors as sc', 'sc.id', '=', 's.style_colors_id')   
        ->leftJoin('product_listing as pl', 'pl.id', '=', 's.product_listing_id')   
        ->where('s.id', $this->id)
        ->get();
        return $data;
        //return Saved_styles::select()->where('id', $this->id)->get();
    }

    public function headings(): array
    {
        return [
            'User',
            'Modal',
            'Preferred Model',
            'Colors',
            'Product',
            'Client Folder',
            'End Date',
            'Created On'
        ];
    }
}
