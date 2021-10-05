<?php



namespace App\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Serializer\SerializerInterface;
use App\Entity\Formularz;
use App\Repository\UsersRepository;
use App\Form\FormularzFormType;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;



class MainController extends AbstractController {
	
    
    /**
     * @Route("/", name="main")
     */
    public function index(Request $request,SluggerInterface $slugger): Response
    {

        $formularz1 = new Formularz();
        $form = $this->createForm(FormularzFormType::class);

        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){
            
            $adres = $form['Adres']->getData();
            $opis = $form['Opis']->getData();
            $pliki = $form['Pliki']->getData();

            
            $formularz1->setUserID('1');
            $formularz1->setAdres($adres);
            $formularz1->setOpis($opis);
            $formularz1->setFlaga('Nowe');
            
            
            
            
            if ($pliki) {
                $originalFilename = pathinfo($pliki->getClientOriginalName(), PATHINFO_FILENAME);
                
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$pliki->guessExtension();

                
                try {
                    $pliki->move(
                        $this->getParameter('files_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    
                }

                $formularz1->setFilesID($newFilename);        
            }
            
                

            $em = $this->getDoctrine()->getManager();
            $em->persist($formularz1);
            $em->flush();

            
        }

        return $this->render('app/app.html.twig',[
            'our_form'=>$form->createView()
        ]);
        
        
    }
    
    
}

?>