<?php


function totalCompras($compras, $cedula_estudiante)
{
    $totaldeCompras = 0;
 
    if(!is_null($cedula_estudiante))
    {
        foreach($compras as $compra)
        {
            
            
            if($compra->user->estudiante != null)
            {
                if($compra->user->estudiante->cedula == $cedula_estudiante)
                {
                    $totaldeCompras += $compra->horas_compradas;
                }
            }

        }
    }
    else
        $totaldeCompras = "Debe filtrar estudiante";

    return $totaldeCompras;
} 




function totalTotal($vuelosAll, $cedula_estudiante, $cedula_instructor, $vuelo_desde, $vuelo_hasta, $avion){

    $totaldeTotales = 0;


    if (is_null($cedula_estudiante) and is_null($cedula_instructor) and is_null($vuelo_desde) and is_null($vuelo_hasta) and is_null($avion))
    {
        foreach($vuelosAll as $vueloAux)
        {
            $totaldeTotales += $vueloAux->horas_voladas;

        }
    }
    else
    {
        foreach($vuelosAll as $vueloAux)
        {
            if(!is_null($cedula_estudiante) and is_null($cedula_instructor) and is_null($vuelo_desde) and is_null($vuelo_hasta) and is_null($avion))
            {
                if($vueloAux->estudiante != null)
                    if($cedula_estudiante == $vueloAux->estudiante->cedula)
                        $totaldeTotales += $vueloAux->horas_voladas;
            }
             else if(is_null($cedula_estudiante) and !is_null($cedula_instructor) and is_null($vuelo_desde) and is_null($vuelo_hasta) and is_null($avion))   
            {
                if($cedula_instructor == $vueloAux->id_instructor)
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($cedula_estudiante) and is_null($cedula_instructor) and is_null($vuelo_desde) and is_null($vuelo_hasta) and !is_null($avion))
            {
                if($avion == $vueloAux->avion)
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($cedula_estudiante) and !is_null($cedula_instructor) and is_null($vuelo_desde) and is_null($vuelo_hasta) and is_null($avion))
            {
                if(($cedula_estudiante == $vueloAux->id_estudiante) and ($cedula_instructor == $vueloAux->id_instructor))
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($cedula_estudiante) and is_null($cedula_instructor) and is_null($vuelo_desde) and is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($cedula_estudiante == $vueloAux->id_estudiante) and ($avion == $vueloAux->avion))
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($cedula_estudiante) and !is_null($cedula_instructor) and is_null($vuelo_desde) and is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($cedula_instructor == $vueloAux->id_instructor) and ($avion == $vueloAux->avion))
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($cedula_estudiante) and !is_null($cedula_instructor) and is_null($vuelo_desde) and is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($cedula_estudiante == $vueloAux->id_estudiante) and ($cedula_instructor == $vueloAux->id_instructor) and ($avion == $vueloAux->avion))
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            //---------------------------------
            else if(!is_null($cedula_estudiante) and is_null($cedula_instructor) and !is_null($vuelo_desde) and !is_null($vuelo_hasta) and is_null($avion))
            {
                if($cedula_estudiante == $vueloAux->id_estudiante and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($cedula_estudiante) and !is_null($cedula_instructor) and !is_null($vuelo_desde) and !is_null($vuelo_hasta) and is_null($avion))   
            {
                if($cedula_instructor == $vueloAux->id_instructor and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($cedula_estudiante) and is_null($cedula_instructor) and !is_null($vuelo_desde) and !is_null($vuelo_hasta) and !is_null($avion))
            {
                if($avion == $vueloAux->avion and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($cedula_estudiante) and !is_null($cedula_instructor) and !is_null($vuelo_desde) and !is_null($vuelo_hasta) and is_null($avion))
            {
                if(($cedula_estudiante == $vueloAux->id_estudiante) and ($cedula_instructor == $vueloAux->id_instructor) and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($cedula_estudiante) and is_null($cedula_instructor) and !is_null($vuelo_desde) and !is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($cedula_estudiante == $vueloAux->id_estudiante) and ($avion == $vueloAux->avion) and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($cedula_estudiante) and !is_null($cedula_instructor) and !is_null($vuelo_desde) and !is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($cedula_instructor == $vueloAux->id_instructor) and ($avion == $vueloAux->avion) and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($cedula_estudiante) and !is_null($cedula_instructor) and !is_null($vuelo_desde) and !is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($cedula_estudiante == $vueloAux->id_estudiante) and ($cedula_instructor == $vueloAux->id_instructor) and ($avion == $vueloAux->avion) and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            //--------------------
            else if(!is_null($cedula_estudiante) and is_null($cedula_instructor) and !is_null($vuelo_desde) and is_null($vuelo_hasta) and is_null($avion))
            {
                if($cedula_estudiante == $vueloAux->id_estudiante and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($cedula_estudiante) and !is_null($cedula_instructor) and !is_null($vuelo_desde) and is_null($vuelo_hasta) and is_null($avion))   
            {
                if($cedula_instructor == $vueloAux->id_instructor and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($cedula_estudiante) and is_null($cedula_instructor) and !is_null($vuelo_desde) and is_null($vuelo_hasta) and !is_null($avion))
            {
                if($avion == $vueloAux->avion and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($cedula_estudiante) and !is_null($cedula_instructor) and !is_null($vuelo_desde) and is_null($vuelo_hasta) and is_null($avion))
            {
                if(($cedula_estudiante == $vueloAux->id_estudiante) and ($cedula_instructor == $vueloAux->id_instructor) and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($cedula_estudiante) and is_null($cedula_instructor) and !is_null($vuelo_desde) and is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($cedula_estudiante == $vueloAux->id_estudiante) and ($avion == $vueloAux->avion) and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($cedula_estudiante) and !is_null($cedula_instructor) and !is_null($vuelo_desde) and is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($cedula_instructor == $vueloAux->id_instructor) and ($avion == $vueloAux->avion) and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($cedula_estudiante) and !is_null($cedula_instructor) and !is_null($vuelo_desde) and is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($cedula_estudiante == $vueloAux->id_estudiante) and ($cedula_instructor == $vueloAux->id_instructor) and ($avion == $vueloAux->avion) and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            //------------
            else if(!is_null($cedula_estudiante) and is_null($cedula_instructor) and is_null($vuelo_desde) and !is_null($vuelo_hasta) and is_null($avion))
            {
                if($cedula_estudiante == $vueloAux->id_estudiante and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($cedula_estudiante) and !is_null($cedula_instructor) and is_null($vuelo_desde) and !is_null($vuelo_hasta) and is_null($avion))   
            {
                if($cedula_instructor == $vueloAux->id_instructor and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($cedula_estudiante) and is_null($cedula_instructor) and is_null($vuelo_desde) and !is_null($vuelo_hasta) and !is_null($avion))
            {
                if($avion == $vueloAux->avion and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($cedula_estudiante) and !is_null($cedula_instructor) and is_null($vuelo_desde) and !is_null($vuelo_hasta) and is_null($avion))
            {
                if(($cedula_estudiante == $vueloAux->id_estudiante) and ($cedula_instructor == $vueloAux->id_instructor) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($cedula_estudiante) and is_null($cedula_instructor) and is_null($vuelo_desde) and !is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($cedula_estudiante == $vueloAux->id_estudiante) and ($avion == $vueloAux->avion) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($cedula_estudiante) and !is_null($cedula_instructor) and is_null($vuelo_desde) and !is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($cedula_instructor == $vueloAux->id_instructor) and ($avion == $vueloAux->avion) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($cedula_estudiante) and !is_null($cedula_instructor) and is_null($vuelo_desde) and !is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($cedula_estudiante == $vueloAux->id_estudiante) and ($cedula_instructor == $vueloAux->id_instructor) and ($avion == $vueloAux->avion) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
        }
    }

    

  return $totaldeTotales;
}