<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class FinanceModel extends Model
{
    protected $table = 'finance';
    protected $primaryKey = 'id';
    protected $allowedFields = ['berita', 'jumlah', 'tipe'];

    public function getDatatable()
    {
        $request = request();
        $columns = is_array($request->getGet('columns')) ? $request->getGet('columns') : [];
        $orders = is_array($request->getGet('order')) ? $request->getGet('order') : [];
        $start = (int) $request->getGet('start') ?: 0;
        $length = (int) $request->getGet('length') ?: 10;

        foreach ($columns as $column) {
            $search = $column['search'];

            if (! empty($search['value'])) {
                if ($search['regex'] === 'true') {
                    $this->where($column['name'], $search['value']);
                } else {
                    $this->like($column['name'], $search['value']);
                }
            }
        }

        foreach ($orders as $order) {
            if ($colName = @$columns[$order['column']]['name']) {
                $this->orderBy($colName, strtoupper($order['dir']));
            }
        }

        $search = @$request->getGet('search')['value'];

        if ($search) {
            $this->orLike('finance.berita', $search);
            $this->orLike('finance.tipe', $search);
        }

        $query = clone $this;

        $this->limit($length, $start);

        $dataModel = $this->get()->getResult();
        $lengthModel = $query->countAllResults();

        return [
            'draw' => (int) $request->getGet('draw'),
            'data' => $dataModel,
            'recordsFiltered' => $lengthModel,
            'recordsTotal' => $lengthModel
        ];
    }
}