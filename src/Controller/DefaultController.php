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

        $items = $entityManager
            ->createQuery('SELECT sd FROM App:SampleData sd')
            ->setMaxResults(12)
            ->getResult();

        return $this->render('default/index.html.twig', [
            'items' => $items,
            'data' => $data,
        ]);
    }

    /**
     * @Route("/server-processing.php", name="server_processing")
     */
    public function serverProcessing()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $recordsTotal = $entityManager
            ->createQuery('SELECT count(sd) FROM App:SampleData sd')
            ->getSingleScalarResult();

        /*var_dump($_GET['search']['value']);
        exit;*/

        $dql = 'SELECT sd FROM App:SampleData sd ';

        if (isset($_GET['search']['value'])) {
            $strMainSearch = $_GET['search']['value'];
            $dql .= 'WHERE '
                ."sd.col1 LIKE '%".$strMainSearch."%' OR "
                ."sd.col2 LIKE '%".$strMainSearch."%' OR "
                ."sd.col3 LIKE '%".$strMainSearch."%' OR "
                ."sd.col4 LIKE '%".$strMainSearch."%' OR "
                ."sd.col5 LIKE '%".$strMainSearch."%' OR "
                ."sd.col6 LIKE '%".$strMainSearch."%' OR "
                ."sd.col7 LIKE '%".$strMainSearch."%' OR "
                ."sd.col8 LIKE '%".$strMainSearch."%' OR "
                ."sd.col9 LIKE '%".$strMainSearch."%' OR "
                ."sd.col10 LIKE '%".$strMainSearch."%' ";
        }

        $items = $entityManager
            ->createQuery($dql)
            ->setMaxResults(10)
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

        return $this->json([
            'draw' => 0,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsTotal,
            'data' => $data,
        ]);
    }
}