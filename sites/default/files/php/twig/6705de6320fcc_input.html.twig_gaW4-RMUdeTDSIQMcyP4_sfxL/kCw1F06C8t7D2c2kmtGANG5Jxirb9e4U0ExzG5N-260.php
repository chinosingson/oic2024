<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/jango/templates/form/input.html.twig */
class __TwigTemplate_0de3ca093df1a783a465d1cf8f50a6089e4fd2932028b923c8478fde484cbc8a extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 16
        $context["classes"] = [0 => "form-group", 1 => "has-feedback", 2 => ((((($__internal_compile_0 =         // line 19
($context["element"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["#type"] ?? null) : null) == "search")) ? ("c-quick-search") : (""))];
        // line 22
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["class" => ($context["classes"] ?? null)]), "html", null, true);
        echo ">
  <input";
        // line 23
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 23, $this->source), "html", null, true);
        echo " />";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->sandbox->ensureToStringAllowed(($context["nd_icon"] ?? null), 23, $this->source));
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 23, $this->source), "html", null, true);
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango/templates/form/input.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 23,  42 => 22,  40 => 19,  39 => 16,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/jango/templates/form/input.html.twig", "/app/web/themes/custom/jango/templates/form/input.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 16);
        static $filters = array("escape" => 22, "raw" => 23);
        static $functions = array("create_attribute" => 22);

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['escape', 'raw'],
                ['create_attribute']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
