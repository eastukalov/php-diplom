<?php

/* admins_admin.twig */
class __TwigTemplate_2192267b35b992f3bf8e44847f656731ddda3f70fe853c100ff66d59b2190e28 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("main_admin.twig", "admins_admin.twig", 1);
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
            <label for=\"login\" class=\"form-control-label col-sm-1\" >Логин</label>
            <div class=\"col-sm-4\">
                ";
        // line 15
        if ( !(null === (isset($context["admin"]) ? $context["admin"] : null))) {
            // line 16
            echo "                    <input type=\"text\" class=\"form-control\" required=\"required\" name=\"login\" pattern=\"{6,}\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "login", array()), "html", null, true);
            echo "\" placeholder=\"Логин\">
                ";
        } else {
            // line 18
            echo "                    <input type=\"text\" class=\"form-control\" required=\"required\" name=\"login\" pattern=\"{6,}\" placeholder=\"Логин\">
                ";
        }
        // line 20
        echo "            </div>
        </div>

        <div class=\"form-group has-feedback\">
            <label for=\"password\" class=\"form-control-label col-sm-1\" >Пароль</label>
            <div class=\"col-sm-4\">
                ";
        // line 26
        if ( !(null === (isset($context["admin"]) ? $context["admin"] : null))) {
            // line 27
            echo "                    <input type=\"password\" class=\"form-control\" required=\"required\" name=\"password\" pattern=\"{6,}\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "password", array()), "html", null, true);
            echo "\" placeholder=\"Пароль\">
                ";
        } else {
            // line 29
            echo "                    <input type=\"password\" class=\"form-control\" required=\"required\" name=\"password\" pattern=\"{6,}\" placeholder=\"Пароль\">
                ";
        }
        // line 31
        echo "            </div>
        </div>

        <div class=\"form-actions\">
            <div class=\"col-sm-offset-2 col-sm-10\">
                <input type=\"hidden\" name=\"add_edit\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["add_edit"]) ? $context["add_edit"] : null), "html", null, true);
        echo "\">
                <input type=\"submit\" class=\"btn btn-primary\" value=
                    ";
        // line 38
        if (((isset($context["add_edit"]) ? $context["add_edit"] : null) == "edit")) {
            // line 39
            echo "                       \"Сохранить\"
                    ";
        } else {
            // line 41
            echo "                       \"Добавить\"
                    ";
        }
        // line 43
        echo "                name=\"addedit\" id=\"addedit\"/>
            </div>
        </div>
    </form>

    <table class=\"table table-bordered\"  style=\"margin-top: 60px;\">
        <thead>
            <tr>
                <th>Администраторы</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 56
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["admins"]) ? $context["admins"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["adm"]) {
            // line 57
            echo "            <tr>
                <td>";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute($context["adm"], "getLogin", array()), "html", null, true);
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
                                <li><a href=\"../controllers/admins.php?id=";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute($context["adm"], "getId", array()), "html", null, true);
            echo "&action=edit\">Изменить</a></li>
                                ";
            // line 69
            if (($this->getAttribute($context["adm"], "getId", array()) == (isset($context["adminId"]) ? $context["adminId"] : null))) {
                // line 70
                echo "                                    <li><a href=\"../controllers/admins.php?id=";
                echo twig_escape_filter($this->env, $this->getAttribute($context["adm"], "getId", array()), "html", null, true);
                echo "&action=delete\">Удалить</a></li>
                                ";
            }
            // line 72
            echo "
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['adm'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
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
        return "admins_admin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 79,  152 => 72,  146 => 70,  144 => 69,  140 => 68,  127 => 58,  124 => 57,  120 => 56,  105 => 43,  101 => 41,  97 => 39,  95 => 38,  90 => 36,  83 => 31,  79 => 29,  73 => 27,  71 => 26,  63 => 20,  59 => 18,  53 => 16,  51 => 15,  45 => 11,  39 => 9,  37 => 8,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admins_admin.twig", "C:\\OSPanel\\domains\\PHP\\diplom\\templates\\admins_admin.twig");
    }
}
