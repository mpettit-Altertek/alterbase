<?php

/* __string_template__0493cc00cd3a6c616489b5c78d96c7a7f8b5b085842780cf303edb5dcaf1ec96 */
class __TwigTemplate_a9c06f7a776d9b3af73beafe42830e28b7601bfecd92b2c51599af28c4a326c8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "parent_rev", array());
    }

    public function getTemplateName()
    {
        return "__string_template__0493cc00cd3a6c616489b5c78d96c7a7f8b5b085842780cf303edb5dcaf1ec96";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* {{item.parent_rev}}*/
