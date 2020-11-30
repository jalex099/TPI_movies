<?php
class Movie //Modelo de Movie
{
    public function showMovies() //Metodo para devolver nombre de la vista de catalogo
    {
        $movieDir = "list.php"; //Asignar nombre del archivo
        return $movieDir; //Retornar nombre del archivo
    }
    public function record() //Metodo para devolver nombre de la vista de registro de alquileres
    {
        $movieDir = "rent.php"; //Asignar nombre del archivo
        return $movieDir; //Retornar nombre del archivo
    }
    public function sale() //Metodo para devolver nombre de la vista de registro de ventas
    {
        $movieDir = "shopping.php"; //Asignar nombre del archivo
        return $movieDir; //Retornar nombre del archivo
    }
    public function array_sort_by(&$arrIni, $col, $order)
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
        if($type == "Albabéticamente") { //Si es por orden alfabetico
            if($order == "Ascendente") { //Si es por orden ascendente
                $this->array_sort_by($data, 'tituloPelicula', SORT_ASC);
            }
            else { //Si no por orden descendente
                $this->array_sort_by($data, 'tituloPelicula', SORT_DESC);
            }
        }
        else if($type == "Popularidad") {

        }

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
