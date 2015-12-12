<?php

namespace AppBundle\Security\Authorization\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\VoterInterface;

/**
 * Class ContentVoter
 * @package AppBundle\Security\Authorization\Voter
 */
class ContentVoter implements VoterInterface
{
    const VIEW = 'view';

    /**
     * @param string $attribute
     * @return bool
     */
    public function supportsAttribute($attribute)
    {
        return in_array($attribute, array(
            self::VIEW,
        ));
    }

    /**
     * @param string $class
     * @return bool
     */
    public function supportsClass($class)
    {
        $supportedClass = 'AppBundle\Entity\Content';

        return $supportedClass === $class || is_subclass_of($class, $supportedClass);
    }

    /**
     * @param TokenInterface            $token
     * @param null                      $content
     * @param array                     $attributes
     * @return int
     */
    public function vote(TokenInterface $token, $content, array $attributes)
    {
        return VoterInterface::ACCESS_DENIED;
        // check if class of this object is supported by this voter
        if (!$this->supportsClass(get_class($content))) {
            return VoterInterface::ACCESS_ABSTAIN;
        }

        // set the attribute to check against
        $attribute = $attributes[0];

        // check if the given attribute is covered by this voter
        if (!$this->supportsAttribute($attribute)) {
            return VoterInterface::ACCESS_ABSTAIN;
        }

        // this point onwards

        $user = $token->getUser();

        if ($user->getContent()->contains($content)) {
            return VoterInterface::ACCESS_GRANTED;
        }

        return VoterInterface::ACCESS_DENIED;
    }

}