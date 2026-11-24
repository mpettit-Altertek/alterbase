<?php

/* __string_template__666390c933de99007a8d3ccfa6251cd6d9b1a757d08c8a1d512d67d5d1b3a0df */
class __TwigTemplate_c2c9506c7ee43283d60618a960644823fecf143f06a572483cc8b992272a19f4 extends Twig_Template
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
        echo $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "data", array()), "child_rev", array());
    }

    public function getTemplateName()
    {
        return "__string_template__666390c933de99007a8d3ccfa6251cd6d9b1a757d08c8a1d512d67d5d1b3a0df";
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
/* {{item.data.child_rev}}*/
