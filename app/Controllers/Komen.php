<?php

namespace App\Controllers;

use App\Models\CommentModel;

class Komen extends BaseController
{

    protected $comment;
    public function __construct()
    {
        $this->comment = new CommentModel();
    }

    public function count()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $comment =  $this->comment->findColumn('idartikel');
            $count = array_count_values($comment);

            echo json_encode($count[$id]);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Maaf halaman tidak ditemukan :)');
        }
    }

    public function tampil()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $comment = $this->comment
                ->orderBy('id', 'DESC')
                ->where('idartikel', $id)
                ->findAll();
            $data = [
                'comment' => $comment
            ];

            $response = [
                'data' => view('ajax/commentShow', $data)
            ];

            echo json_encode($response);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Maaf halaman tidak ditemukan :)');
        }
    }

    public function tambahkomentar()
    {

        if ($this->request->isAJAX()) {
            $pQuery = $this->comment->prepare(function ($comment) {
                return $comment->table('comment')
                    ->insert([
                        'idartikel'     => '?',
                        'created_at'    => '?',
                        'komen'         => '?'
                    ]);
            });

            // Collect the Data
            $idartikel = $this->request->getVar('idartikel');
            $created_at = date('Y-m-d H:i:s', strtotime('now'));
            $komen = htmlspecialchars($this->request->getVar('komen'));

            // Run the Query
            echo json_encode($idartikel);
            return $pQuery->execute($idartikel, $created_at, $komen);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Maaf halaman tidak ditemukan :)');
        }
    }
}
