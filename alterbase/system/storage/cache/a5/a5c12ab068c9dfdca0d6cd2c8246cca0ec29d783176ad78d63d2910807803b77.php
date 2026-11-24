<?php

/* __string_template__3798711b0ee6e923311f1da14ec91afa49808430059d6a8b2375c4023c0168ef */
class __TwigTemplate_044095778e7cdc5c798b1518800cb248cfdc3a60298ea02cb27137e1701e4552 extends Twig_Template
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
        echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "parent_id", array());
    }

    public function getTemplateName()
    {
        return "__string_template__3798711b0ee6e923311f1da14ec91afa49808430059d6a8b2375c4023c0168ef";
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
/* {{item.parent_id}}*/
