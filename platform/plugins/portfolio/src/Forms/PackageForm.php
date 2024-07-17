<?php

namespace Botble\Portfolio\Forms;

use Botble\Base\Forms\FieldOptions\ContentFieldOption;
use Botble\Base\Forms\FieldOptions\DescriptionFieldOption;
use Botble\Base\Forms\FieldOptions\NameFieldOption;
use Botble\Base\Forms\FieldOptions\StatusFieldOption;
use Botble\Base\Forms\Fields\EditorField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\FormAbstract;
use Botble\Portfolio\Enums\PackageDuration;
use Botble\Portfolio\Http\Requests\PackageRequest;
use Botble\Portfolio\Models\Package;

class PackageForm extends FormAbstract
{
    public function setup(): void
    {
        $this
            ->setupModel(new Package())
            ->setValidatorClass(PackageRequest::class)
            ->add('name', TextField::class, NameFieldOption::make()->required()->toArray())
            ->add('description', TextareaField::class, DescriptionFieldOption::make()->toArray())
            ->add('content', EditorField::class, ContentFieldOption::make()->allowedShortcodes()->toArray())
            ->add('duration', 'customSelect', [
                'label' => trans('plugins/portfolio::portfolio.duration'),
                'required' => true,
                'attr' => [
                    'class' => 'select-search-full',
                ],
                'choices' => PackageDuration::labels(),
            ])
            ->add('price', 'text', [
                'label' => trans('plugins/portfolio::portfolio.price'),
                'required' => true,
                'attr' => [
                    'placeholder' => trans('plugins/portfolio::portfolio.form.price_placeholder'),
                ],
            ])
            ->add('annual_price', 'text', [
                'label' => trans('plugins/portfolio::portfolio.annual_price'),
                'attr' => [
                    'placeholder' => trans('plugins/portfolio::portfolio.form.price_placeholder'),
                ],
                'help_block' => [
                    'text' => trans('plugins/portfolio::portfolio.form.packages_switch_pricing_plan'),
                ],
            ])
            ->add('features', 'textarea', [
                'label' => trans('plugins/portfolio::portfolio.form.features'),
                'required' => true,
                'attr' => [
                    'placeholder' => trans('plugins/portfolio::portfolio.form.features_placeholder'),
                ],
                'help_block' => [
                    'text' => trans('plugins/portfolio::portfolio.form.features_help_block'),
                ],
            ])
            ->add('is_popular', 'onOff', [
                'label' => trans('plugins/portfolio::portfolio.is_popular'),
            ])
            ->add('status', SelectField::class, StatusFieldOption::make()->toArray())
            ->setBreakFieldPoint('status');
    }
}
