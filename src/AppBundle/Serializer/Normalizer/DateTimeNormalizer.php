<?php

namespace AppBundle\Serializer\Normalizer;

use DateTime;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class DateTimeNormalizer implements NormalizerInterface, DenormalizerInterface
{
    /**
     * Date Format
     * 
     * @var string
    */
    protected $dateFormat = "d/m/Y H\\hm";

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return is_object($data) && $data instanceof DateTime;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($object, $type, $format = null, array $context = array())
    {
        return $type === 'DateTime';
    }

    /**
     * {@inheritdoc}
     */
    public function normalize($object, $format = null, array $context = array())
    {
        return $object->format($this->dateFormat);
    }

    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        return new DateTime($data);
    }
}