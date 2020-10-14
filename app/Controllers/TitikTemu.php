<?php

namespace App\Controllers;

use  App\Models\TitiktemuModel;
use App\Models\CommentModel;

class TitikTemu extends BaseController
{
	protected $artikel;
	protected $comment;
	public function __construct()
	{
		$this->artikel = new TitiktemuModel();
		$this->comment = new CommentModel();
	}

	public function index()
	{
		$artikel = $this->artikel->orderBy('id', 'DESC')->paginate(18);
		$comment = $this->comment->findColumn('idartikel');
		if ($comment === null) {
			$comment = [];
		};

		$data = [
			'tittle'	=> 'Titik Temu',
			'artikel'	=> $artikel,
			'comment'	=> $comment,

			'pager'		=> $this->artikel->pager
		];
		return view('titiktemu', $data);
	}

	function tulis()
	{


		$pQuery = $this->artikel->prepare(function ($artikel) {
			return $artikel->table('artikel')
				->insert([
					'created_at'	=> '?',
					'konten'        => '?'
				]);
		});

		// Collect the Data
		$created_at = date('Y-m-d H:i:s', strtotime('now'));
		$konten = htmlspecialchars($this->request->getVar('konten'));

		// Run the Query
		$pQuery->execute($created_at, $konten);
		return redirect()->to("/titiktemu");
	}



	//--------------------------------------------------------------------

}
