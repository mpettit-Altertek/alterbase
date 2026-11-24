<?php

/* __string_template__c2ef975f835022cc79b54f697553896b879c9b9a5310a80356b1f064eb247109 */
class __TwigTemplate_c5b96cc14d86c65e25c81d3fd13be53c1552c87543434c8f95814048a1ad1e97 extends Twig_Template
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
        echo $this->getAttribute($this->getAttribute((isset($context["item"]) ? $context["item"] : null), "data", array()), "Quantity", array());
    }

    public function getTemplateName()
    {
        return "__string_template__c2ef975f835022cc79b54f697553896b879c9b9a5310a80356b1f064eb247109";
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
/* {{item.data.Quantity}}*/
