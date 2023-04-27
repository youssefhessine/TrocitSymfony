<?php

namespace App\Controller;

use App\Entity\Rapport;
use App\Form\RapportType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


#[Route('/rapport')]
class RapportController extends AbstractController
{
    #[Route('/', name: 'rapport_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $rapports = $entityManager
            ->getRepository(Rapport::class)
            ->findAll();

        return $this->render('rapport/index.html.twig', [
            'rapports' => $rapports,
        ]);
    }

    #[Route('/new', name: 'rapport_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $rapport = new Rapport();
        $form = $this->createForm(RapportType::class, $rapport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($rapport);
            $entityManager->flush();

            return $this->redirectToRoute('rapport_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rapport/new.html.twig', [
            'rapport' => $rapport,
            'form' => $form,
        ]);
    }

    #[Route('/{reference}', name: 'rapport_show', methods: ['GET'])]
    public function show(Rapport $rapport): Response
    {
        return $this->render('rapport/show.html.twig', [
            'rapport' => $rapport,
        ]);
    }

    #[Route('/{reference}/edit', name: 'rapport_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Rapport $rapport, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RapportType::class, $rapport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('rapport_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rapport/edit.html.twig', [
            'rapport' => $rapport,
            'form' => $form,
        ]);
    }

    #[Route('/{reference}', name: 'rapport_delete', methods: ['POST'])]
    public function delete(Request $request, Rapport $rapport, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($rapport);
        $entityManager->flush();

        return $this->redirectToRoute('rapport_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/rapport/{reference}/pdf', name: 'export_pdf', methods: ['GET'])]
    public function exportPdf($reference, Request $request)
    {
        // Get the rapport by reference
        $rapport = $this->getDoctrine()
            ->getRepository(Rapport::class)
            ->findOneBy(['reference' => $reference]);
    
        // Generate the HTML for the PDF
        $html = $this->renderView('rapport/rapportPDF.html.twig', [
            'rapport' => $rapport,
        ]);
    
        // Generate the PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        // Create a response object with the PDF content
        $response = new Response();
        $response->setContent($dompdf->output());
    
        // Set the content type header
        $response->headers->set('Content-Type', 'application/pdf');
    
        // Set the file name header
        $response->headers->set('Content-Disposition', 'attachment;filename="rapport.pdf"');
    
        // Save the PDF URL in session
        $pdfUrl = $this->generateUrl('export_pdf', ['reference' => $reference], UrlGeneratorInterface::ABSOLUTE_URL);
        $request->getSession()->set('pdf_url', $pdfUrl);
    
        // Return the response object containing the PDF content
        return $response;
    }
    

}
