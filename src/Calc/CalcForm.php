<?php

declare(strict_types=1);

namespace App\Calc;

use App\Calc\DTO\CalcInputDTO;
use App\Calc\Enum\CalcOperationEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalcForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstValue', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 10
                ]
            ])
            ->add('operation', ChoiceType::class, [
                'choices' => [
                    CalcOperationEnum::addition->value => CalcOperationEnum::addition,
                    CalcOperationEnum::subtraction->value => CalcOperationEnum::subtraction,
                    CalcOperationEnum::multiplying->value => CalcOperationEnum::multiplying,
                    CalcOperationEnum::division->value => CalcOperationEnum::division
                ]
            ])
            ->add('secondValue', IntegerType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 10
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CalcInputDTO::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return '';
    }
}
