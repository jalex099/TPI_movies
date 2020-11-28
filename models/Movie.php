<?php
class Movie //Modelo de Movie
{
    public function showMovies() //Metodo para devolver nombre de la vista de catalogo
    {
        $movieDir = "list.php"; //Asignar nombre del archivo
        return $movieDir; //Retornar nombre del archivo
    }
    function array_sort_by($arrIni, $col, $order)
    {
        $arrAux = array();
        foreach ($arrIni as $key=> $row)
        {
            $arrAux[$key] = is_object($row) ? $arrAux[$key] = $row->$col : $row[$col];
            $arrAux[$key] = strtolower($arrAux[$key]);
        }
        array_multisort($arrAux, $order, $arrIni);
    }
    public function getFilter($data, $type, $order) //Metodo para devolver nombre de la vista de catalogo con filtro
    {
        $this->array_sort_by($data, 'tituloPelicula', $order = SORT_ASC);

        return $data; //Retornar nombre del archivo
    }
    public function preview() //Metodo para devolver nombre de la vista de vista previa
    {
        $movieDir = "preview.php"; //Asignar nombre del archivo
        return $movieDir; //Retornar nombre del archivo
    }
    public function form() //Metodo para devolver nombre de la vista de formulario para agregar, modificar o eliminar
    {
        $formDir = "form.php"; //Asignar nombre del archivo
        return $formDir; //Retornar nombre del archivo
    }
}
