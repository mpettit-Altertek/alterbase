<?php

/* __string_template__292a7d9be114e7ee31d06fa419d9a14d861eb299cc7b3a3121113b43cb25c8a1 */
class __TwigTemplate_93a44949f3ad2053121b53baad0a915956528ac1d7f41684dfb1146b0e4b4b13 extends Twig_Template
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
        echo $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "data", array()), "Line_item", array());
    }

    public function getTemplateName()
    {
        return "__string_template__292a7d9be114e7ee31d06fa419d9a14d861eb299cc7b3a3121113b43cb25c8a1";
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
/* {{item.data.Line_item}}*/
