<?php

/* categories_admin.twig */
class __TwigTemplate_a78d51900b033c15249acd044ec7e46fb53b123cd04d5ed84231e8da9c95101b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("main_admin.twig", "categories_admin.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "main_admin.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
<div class=\"table-responsive container\"  style=\"padding-bottom: 40px; margin-top: 70px;\">

    <form role=\"form\" class=\"form-horizontal\" method=\"POST\">
        ";
        // line 8
        if ( !twig_test_empty((isset($context["error"]) ? $context["error"] : null))) {
            // line 9
            echo "            <div class=\"alert alert-danger\" role=\"alert\">";
            echo twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true);
            echo "</div>
        ";
        }
        // line 11
        echo "
        <div class=\"form-group has-feedback\">
            <label for=\"categoryName\" class=\"form-control-label col-sm-1\" >Тема</label>
            <div class=\"col-sm-4\">
                ";
        // line 15
        if ( !(null === (isset($context["category"]) ? $context["category"] : null))) {
            // line 16
            echo "                    <input type=\"text\" class=\"form-control\" required=\"required\" name=\"categoryName\" pattern=\"{2,}\" value=\"";
            echo twig_escape_filter($this->env, (isset($context["category"]) ? $context["category"] : null), "html", null, true);
            echo "\" placeholder=\"Тема\">
                ";
        } else {
            // line 18
            echo "                    <input type=\"text\" class=\"form-control\" required=\"required\" name=\"categoryName\" pattern=\"{6,}\" placeholder=\"Тема\">
                ";
        }
        // line 20
        echo "            </div>
        </div>

        <div class=\"form-actions\">
            <div class=\"col-sm-offset-2 col-sm-10\">
                <input type=\"hidden\" name=\"add_edit\" value=\"";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["add_edit"]) ? $context["add_edit"] : null), "html", null, true);
        echo "\">
                <input type=\"submit\" class=\"btn btn-primary\" value=
                    ";
        // line 27
        if (((isset($context["add_edit"]) ? $context["add_edit"] : null) == "edit")) {
            // line 28
            echo "                       \"Сохранить\"
                    ";
        } else {
            // line 30
            echo "                       \"Добавить\"
                    ";
        }
        // line 32
        echo "                name=\"addedit\" id=\"addedit\"/>
            </div>
        </div>
    </form>

    <table class=\"table table-bordered\"  style=\"margin-top: 60px;\">
        <thead>
            <tr>
                <th>Темы</th>
                <th>Всего вопросов в теме</th>
                <th>в т.ч. опубликовано</th>
                <th>в т.ч. без ответа</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 48
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["cat"]) {
            // line 49
            echo "            <tr>
                <td>";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute($context["cat"], "getCategoryName", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["cat"], "getCount", array()), "countQuestions", array(), "array"), "html", null, true);
            echo "</td>
                <td>";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["cat"], "getCount", array()), "countQuestionsPublic", array(), "array"), "html", null, true);
            echo "</td>
                <td>";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["cat"], "getCount", array()), "countQuestionsNotWork", array(), "array"), "html", null, true);
            echo "</td>
                <td class=\"col-sm-2\">
                    <div class=\"input-group\">
                        <div class=\"input-group-btn\">
                            <button type=\"button\" class=\"btn btn-default\">Действие</button>
                            <button type=\"button\" class=\"btn btn-default dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                <span class=\"caret\"></span>
                                <span class=\"sr-only\">Toggle Dropdown</span>
                            </button>
                            <ul class=\"dropdown-menu\">
                                <li><a href=\"../controllers/categories.php?id=";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute($context["cat"], "getCategoryId", array()), "html", null, true);
            echo "&action=edit\">Изменить</a></li>
                                <li><a href=\"../controllers/categories.php?id=";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute($context["cat"], "getCategoryId", array()), "html", null, true);
            echo "&action=delete\">Удалить</a></li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "        </tbody>
    </table>
</div>

<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
<script src=\"../vendor/twbs/bootstrap/dist/js/bootstrap.min.js\"></script>
    <script>
        \$(function() {
            \$('#addedit').click(function() {

                \$('input').each(function() {
                    var formGroup = \$(this).parents('.form-group');
                    if (this.checkValidity()) {
                        formGroup.addClass('has-success').removeClass('has-error');
                    } else {
                        formGroup.addClass('has-error').removeClass('has-success');
                    }
                });

            });
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "categories_admin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 71,  139 => 64,  135 => 63,  122 => 53,  118 => 52,  114 => 51,  110 => 50,  107 => 49,  103 => 48,  85 => 32,  81 => 30,  77 => 28,  75 => 27,  70 => 25,  63 => 20,  59 => 18,  53 => 16,  51 => 15,  45 => 11,  39 => 9,  37 => 8,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "categories_admin.twig", "/var/www/user_data/estukalov/php/diplom/templates/categories_admin.twig");
    }
}
