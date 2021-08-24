<?php
class modelo_prueba extends CI_Model 
{ 
   public function __construct() 
   {
      parent::__construct();
   }

   public function obtener_folio($folio) 
   {
      $this->db->select('*');
      $this->db->from('boleta');
      $this->db->where('folio',$folio);
      $consulta = $this->db->get();
      $resultado = $consulta->row();
       if($resultado == null or $resultado == '') 
      {
         return 0;
      }
      else{
         return 1;
      }
   }
   public function guardar($data) {
       return $this->db->insert('boleta',$data);
   }
   public function obtener_folios() 
   {
      $this->db->select('*');
      $this->db->from('boleta');
      $consulta = $this->db->get();
      $resultado = $consulta->result();
      return $resultado;
   }
   public function actualizar($id, $data) {
      $this->db->where('id', $id);
      $this->db->update('boleta', $data);
   }
   public function eliminar($id) {
      $this->db->where('id', $id);
      $this->db->delete('boleta');
   }
}
