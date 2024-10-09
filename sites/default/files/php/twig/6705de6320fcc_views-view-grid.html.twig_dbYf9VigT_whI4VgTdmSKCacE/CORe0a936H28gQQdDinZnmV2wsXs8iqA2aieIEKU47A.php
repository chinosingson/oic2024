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

/* themes/custom/jango/templates/views/views-view-grid.html.twig */
class __TwigTemplate_4d1fa3c146cf5e6f3852cc19218be55b79c8ebcf4ce3e9f085d15de61d83e378 extends \Twig\Template
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
        // line 29
        $context["columns_classes"] = [1 => 12, 2 => 6, 3 => 4, 4 => 3, 6 => 2, 12 => 1];
        // line 30
        $context["bootstrap_class"] = (((($__internal_compile_0 = ($context["columns_classes"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "columns", [], "any", false, false, true, 30)] ?? null) : null)) ? ((($__internal_compile_1 = ($context["columns_classes"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "columns", [], "any", false, false, true, 30)] ?? null) : null)) : (3));
        // line 32
        $context["classes"] = [0 => "views-view-grid", 1 => twig_get_attribute($this->env, $this->source,         // line 34
($context["options"] ?? null), "alignment", [], "any", false, false, true, 34), 2 => ("cols-" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,         // line 35
($context["options"] ?? null), "columns", [], "any", false, false, true, 35), 35, $this->source)), 3 => "clearfix"];
        // line 39
        if (twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "row_class_default", [], "any", false, false, true, 39)) {
            // line 40
            echo "  ";
            // line 41
            $context["row_classes"] = [0 => "views-row", 1 => (((twig_get_attribute($this->env, $this->source,             // line 43
($context["options"] ?? null), "alignment", [], "any", false, false, true, 43) == "horizontal")) ? ("clearfix") : (""))];
        }
        // line 47
        if (twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "col_class_default", [], "any", false, false, true, 47)) {
            // line 48
            echo "  ";
            // line 49
            $context["col_classes"] = [0 => "views-col", 1 => (((twig_get_attribute($this->env, $this->source,             // line 51
($context["options"] ?? null), "alignment", [], "any", false, false, true, 51) == "vertical")) ? ("clearfix") : (""))];
        }
        // line 55
        if (($context["title"] ?? null)) {
            // line 56
            echo "  <h3>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 56, $this->source), "html", null, true);
            echo "</h3>
";
        }
        // line 58
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 58), 58, $this->source), "html", null, true);
        echo ">
  ";
        // line 59
        if ((twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "alignment", [], "any", false, false, true, 59) == "horizontal")) {
            // line 60
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["row_number"] => $context["row"]) {
                // line 61
                echo "      <div class=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ("row-" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 61), 61, $this->source)), "html", null, true);
                echo "\">
        ";
                // line 62
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["row"], "content", [], "any", false, false, true, 62));
                foreach ($context['_seq'] as $context["column_number"] => $context["column"]) {
                    // line 63
                    echo "          <div";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 63), "addClass", [0 => ("col-md-" . $this->sandbox->ensureToStringAllowed(($context["bootstrap_class"] ?? null), 63, $this->source)), 1 => ((($context["column_classes"] ?? null)) ? ((($__internal_compile_2 = (($__internal_compile_3 = ($context["column_classes"] ?? null)) && is_array($__internal_compile_3) || $__internal_compile_3 instanceof ArrayAccess ? ($__internal_compile_3[$context["row_number"]] ?? null) : null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[$context["column_number"]] ?? null) : null)) : (""))], "method", false, false, true, 63), "removeAttribute", [0 => "style"], "method", false, false, true, 63), 63, $this->source), "html", null, true);
                    echo ">
            ";
                    // line 64
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 64), 64, $this->source), "html", null, true);
                    echo "
          </div>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['column_number'], $context['column'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 67
                echo "      </div>
    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['row_number'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 69
            echo "  ";
        } else {
            // line 70
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
                // line 71
                echo "      <div";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["column"], "attributes", [], "any", false, false, true, 71), "addClass", [0 => ($context["col_classes"] ?? null), 1 => ((twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "col_class_default", [], "any", false, false, true, 71)) ? (("col-" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 71), 71, $this->source))) : (""))], "method", false, false, true, 71), 71, $this->source), "html", null, true);
                echo ">
        ";
                // line 72
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["column"], "content", [], "any", false, false, true, 72));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                    // line 73
                    echo "          <div";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["row"], "attributes", [], "any", false, false, true, 73), "addClass", [0 => ($context["row_classes"] ?? null), 1 => ((twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "row_class_default", [], "any", false, false, true, 73)) ? (("row-" . $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, true, 73), 73, $this->source))) : (""))], "method", false, false, true, 73), 73, $this->source), "html", null, true);
                    echo ">
            ";
                    // line 74
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["row"], "content", [], "any", false, false, true, 74), 74, $this->source), "html", null, true);
                    echo "
          </div>
        ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 77
                echo "      </div>
    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 79
            echo "  ";
        }
        // line 80
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/jango/templates/views/views-view-grid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  217 => 80,  214 => 79,  199 => 77,  182 => 74,  177 => 73,  160 => 72,  155 => 71,  137 => 70,  134 => 69,  119 => 67,  110 => 64,  105 => 63,  101 => 62,  96 => 61,  78 => 60,  76 => 59,  71 => 58,  65 => 56,  63 => 55,  60 => 51,  59 => 49,  57 => 48,  55 => 47,  52 => 43,  51 => 41,  49 => 40,  47 => 39,  45 => 35,  44 => 34,  43 => 32,  41 => 30,  39 => 29,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/jango/templates/views/views-view-grid.html.twig", "/app/web/themes/custom/jango/templates/views/views-view-grid.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 29, "if" => 39, "for" => 60);
        static $filters = array("escape" => 56);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for'],
                ['escape'],
                []
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
