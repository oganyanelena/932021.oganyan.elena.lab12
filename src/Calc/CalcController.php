<?php

declare(strict_types=1);

namespace App\Calc;

use App\Calc\Enum\CalcModeEnum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CalcController extends AbstractController
{
    #[Route(path: '/calc/{mode}', name: 'show_calc')]
    public function index(Request $request, CalcService $calcService, CalcModeEnum $mode): Response
    {
        $form = $this->createForm(CalcForm::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $resultDTO = $calcService->getResultDTOFromInputDTO($form->getData());
            } catch (DivisionByZeroException $exception) {
                $form->addError(new FormError($exception->getMessage()));
            }
        }

        return $this->render('@src_dir/Calc/output.twig', [
            'form' => $form->createView(),
            'mode' => $mode->value,
            'resultDTO' => $resultDTO ?? null,
        ]);
    }
}
