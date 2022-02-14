<?php
/**
 * Clase para la paginación
 */
class Paginator {
     private $_conn; //objeto de conexión
     private $_limit; //número total de registros por página
     private $_page; //página actual
     private $_query; //consulta
     private $_total; //número total de registros
     /**
      * Constructor especializado al que se le pasa la conexión y la consulta de datos
      */
     public function __construct($conn,$query) {
    
        $this->_conn = $conn;
        $this->_query = $query;
    
        $rs= $this->_conn->query($this->_query);
        $this->_total = $rs->num_rows;
    }
    /**
     * Método para obtener en un array de objetos de datos todas
     * las columnas de la tabla consultada
     */
    public function getData($limit = 25,$page = 1) {
        $this->_limit=$limit;
        $this->_page=$page;
    
        if ($this->_limit == 'all' ) {
            $query=$this->_query;
        } else {
            //se calcula la posición inicial y final de los registros a consultar
            $start = (($this->_page-1) * $this->_limit)+1;
            $end = (($this->_page-1) * $this->_limit)+ $this->_limit;
            $query=$this->_query . " LIMIT " . $start . ",". $end;
        }
        $rs=$this->_conn->query($query);
        while ($row=$rs->fetch_assoc() ) {
            $results[] = $row;
        }

        $result=new stdClass();
        $result->page   = $this->_page;
        $result->limit  = $this->_limit;
        $result->total  = $this->_total;
        $result->data   = $results;
        //se devuelve un objeto de datos que contiene la página actual,
        //el límite de registros en la página y el total de registros
        //devueltos por la consulta inicial, también un array con los registros
        //de la página actual
        return $result;
    }
    /**
     * Creación de los enlaces de páginas para navegar
     */
    public function createLinks($links,$list_class,$item_class,$link_class) {
        //1 si no hay paginación se incluyen todos los registros en la misma
        //página y no se muestra el paginador
        if ($this->_limit=='all') {
            return '';
        }
        //2 se obtiene el número de páginas
        $last=ceil($this->_total/$this->_limit );
        //3 se obtiene la pagina inicial
        $start=(($this->_page-$links )>0 )?$this->_page - 
        $links : 1;
        //se obtiene la página final
        $end=(($this->_page+$links)<$last)?$this->_page + 
        $links:$last;
       
        //4 se prepara el botón de ir a la primera página
        $html='<ul class="' . $list_class . '">';
        $class=($this->_page==1)?"$item_class disabled":$item_class;
        $html.= '<li class="' . $class . '"><a class="'. $link_class. '" href="?limit=' . 
        $this->_limit . '&page=' . ($this->_page - 1) . '">&laquo;</a></li>';
        
        //5 si no está accesible la primera página se se muestran puntos suspensivos
        // entre las páginas intermedias
        if ($start > 1) {
            $html.= '<li><a class="'.$link_class.'" href="?limit=' . $this->_limit . 
        '&page=1">1</a></li>';
            $html.= '<li class="disabled"><span>...</span></li>';
        }
        //6 se muestran las páginas de navegación
        for ($i = $start ; $i <= $end; $i++) {
            $class= ( $this->_page == $i ) ? "$item_class active" : $item_class;
            $html.= '<li class="' . $class . '"><a class="'.$link_class. '" href="?limit=' . 
        $this->_limit . '&page=' . $i . '">' . $i . '</a></li>';
            }
        //7 si no está accesible la última página se muestran puntos suspensivos
        //entre las páginas intermedias
        if ($end < $last) {
            $html.= '<li class="disabled"><span>...</span></li>';
            $html.= '<li><a class="'. $link_class. '" href="?limit=' . $this->_limit . 
        '&page=' . $last . '">' . $last . '</a></li>';
        }
        //8 si estamos en la última página se deshabilita el botón de ir a la última
        //página
        $class= ( $this->_page == $last ) ? "$item_class disabled" : $item_class;
        $html.= '<li class="' . $class . '"><a class="'.$link_class. '" href="?limit=' . 
        $this->_limit . '&page=' . ( $this->_page + 1 ) . '">&raquo;</a></li>';
        //se cierra la lista de páginas de navegación
        $html.= '</ul>';
        //se devuelve la lista de páginas de navegación
        return $html;
    }    
}
?>