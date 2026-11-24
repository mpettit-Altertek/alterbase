<?php

/* __string_template__3d698d7c8d99346179564add963767d67a07569aedcd9f5e96c033137530ebb6 */
class __TwigTemplate_4a3848da1dbec680ceb6c5beeaeee6cf66c9b2c504a721b6b38ebef7c16f8541 extends Twig_Template
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
        echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "Quantity", array());
    }

    public function getTemplateName()
    {
        return "__string_template__3d698d7c8d99346179564add963767d67a07569aedcd9f5e96c033137530ebb6";
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
/* {{item.Quantity}}*/
