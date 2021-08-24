<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctrl_prueba extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('modelo_prueba');
	}

	public function index()
	{
		$data['datos'] = $this->modelo_prueba->obtener_folios();
		$this->load->view('prueba', $data);
	}
	public function guardar() {
		$folio = $this->input->post("folio");
		$nombre = $this->input->post("nombre");
		$fecha = $this->input->post("fecha");
		$valor = $this->input->post("valor");

		$existe = $this->modelo_prueba->obtener_folio($folio);
		var_dump($existe);
		if ($existe >= 1) {
			return 1;
		}
		else {
			$data = array(
			'folio' => $folio,
			'nombre' => $nombre,
			'fecha' => $fecha,
			'valor' => $valor
			);
			$this->modelo_prueba->guardar($data);
			return 0;
		}
		
	}
	public function actualizar() {
		$id = $this->input->post("id");
		$nombre = $this->input->post("nombre_edit");
		$fecha = $this->input->post("fecha_edit");
		$valor = $this->input->post("valor_edit");

		$data = array(
			'nombre' => $nombre,
			'fecha' => $fecha,
			'valor' => $valor
		);
		$this->modelo_prueba->actualizar($id, $data);
	}
	public function eliminar() {
		$id = $this->input->post("id");
		$this->modelo_prueba->eliminar($id);
	}
}
