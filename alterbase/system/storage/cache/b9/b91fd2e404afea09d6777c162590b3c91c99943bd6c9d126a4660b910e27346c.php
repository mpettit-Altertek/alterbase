<?php

/* __string_template__c2d8338f2a3be8eb29aa45073e3d62108e8fd0fb7bb460408938caf279a1a2e5 */
class __TwigTemplate_3f9af3d49d77313b86d3e51189b2b68fd007e28b799bb16705a7e651a7cca6ca extends Twig_Template
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
        echo $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "data", array()), "child", array()), "rev", array());
    }

    public function getTemplateName()
    {
        return "__string_template__c2d8338f2a3be8eb29aa45073e3d62108e8fd0fb7bb460408938caf279a1a2e5";
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
/* {{item.data.child.rev}}*/
