<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $data['recordsTotal'] = $entityManager
            ->createQuery('SELECT count(sd) FROM App:SampleData sd')
            ->getSingleScalarResult();

        return $this->render('default/index.html.twig', [
            'data' => $data,
        ]);
    }

    /**
     * @Route("/server-processing.php", name="server_processing")
     */
    public function serverProcessing()
    {
        $entityManager = $this->getDoctrine()->getManager();

        /*var_dump($_GET['search']['value']);
        exit;*/

        $dql = 'SELECT sd FROM App:SampleData sd';
        $dqlCountFiltered = 'SELECT count(sd) FROM App:SampleData sd';

        $sqlFilter = '';

        if (!empty($_GET['search']['value'])) {
            $strMainSearch = $_GET['search']['value'];

            $sqlFilter .= " (sd.col1 LIKE '%".$strMainSearch."%' OR "
                ."sd.col2 LIKE '%".$strMainSearch."%' OR "
                ."sd.col3 LIKE '%".$strMainSearch."%' OR "
                ."sd.col4 LIKE '%".$strMainSearch."%' OR "
                ."sd.col5 LIKE '%".$strMainSearch."%' OR "
                ."sd.col6 LIKE '%".$strMainSearch."%' OR "
                ."sd.col7 LIKE '%".$strMainSearch."%' OR "
                ."sd.col8 LIKE '%".$strMainSearch."%' OR "
                ."sd.col9 LIKE '%".$strMainSearch."%' OR "
                ."sd.col10 LIKE '%".$strMainSearch."%') ";
        }

        // Filter columns with AND restriction
        $strColSearch = '';
        foreach ($_GET['columns'] as $column) {
            if (!empty($column['search']['value'])) {
                if (!empty($strColSearch)) {
                    $strColSearch .= ' AND ';
                }
                $strColSearch .= ' sd.'.$column['name']." LIKE '%".$column['search']['value']."%'";
            }
        }
        if (!empty($sqlFilter)) {
            $sqlFilter .= ' AND ('.$strColSearch.')';
        } else {
            $sqlFilter .= $strColSearch;
        }

        if (!empty($sqlFilter)) {
            $dql .= ' WHERE'.$sqlFilter;
            $dqlCountFiltered .= ' WHERE'.$sqlFilter;
            /*var_dump($dql);
            var_dump($dqlCountFiltered);
            exit;*/
        }

        //var_dump($dql); exit;

        $items = $entityManager
            ->createQuery($dql)
            ->setFirstResult($_GET['start'])
            ->setMaxResults($_GET['length'])
            ->getResult();

        $data = [];
        foreach ($items as $key => $value) {
            $data[] = [
                $value->getCol1(),
                $value->getCol2(),
                $value->getCol3(),
                $value->getCol4(),
                $value->getCol5(),
                $value->getCol6(),
                $value->getCol7(),
                $value->getCol8(),
                $value->getCol9(),
                $value->getCol10(),
            ];
        }

        $recordsTotal = $entityManager
            ->createQuery('SELECT count(sd) FROM App:SampleData sd')
            ->getSingleScalarResult();

        $recordsFiltered = $entityManager
            ->createQuery($dqlCountFiltered)
            ->getSingleScalarResult();

        return $this->json([
            'draw' => 0,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
            'dql' => $dql,
            'dqlCountFiltered' => $dqlCountFiltered,
        ]);
    }
}
