<?php

/* __string_template__9da0b720e731214b6be4c3858c0628c27407aadcc249599e2b1f8e55901f6cb7 */
class __TwigTemplate_b8f38dc00ec9a4f44966b0d0f40d0750c46db62d7accf367727ca7fd01897429 extends Twig_Template
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
        echo $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "data", array()), "Reference", array());
    }

    public function getTemplateName()
    {
        return "__string_template__9da0b720e731214b6be4c3858c0628c27407aadcc249599e2b1f8e55901f6cb7";
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
/* {{item.data.Reference}}*/
