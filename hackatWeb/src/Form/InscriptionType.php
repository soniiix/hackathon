<?php

namespace App\Form;

use App\Entity\Participant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ['label' => 'Nom :'])
            ->add('prenom', TextType::class, ['label' => 'Prénom :'])
            ->add('mail', TextType::class, ['label' => 'Adresse email :'])
            ->add('tel', IntegerType::class, ['label' => 'Numéro de téléphone :'])
            ->add('dateNaissance', BirthdayType::class, ['label' => 'Date de naissance :'])
            ->add('lienPortfolio', TextType::class, ['label' => 'Lien de votre portfolio :'])
            ->add('mdp', PasswordType::class, ['label' => 'Choisissez un mot de passe :'])
            //->add('roles')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Participant::class,
        ]);
    }
}
