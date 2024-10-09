<?php
class homeController extends controller {

	private $user;

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [];

        $cidades = new Cidade();
        $data['cidades'] = $cidades->getAll();
        $data['tipoCarro'] = TipoCarro::CARROS;
        
        $this->loadTemplate('home', $data);
    }

    public function orcamento() {

        var_dump("teste");
        $data = [];
        if (empty($_POST['origem']) || empty($_POST['destino']) || empty($_POST['tipo'])) {
            header('Location: '.BASE_URL);
        }

        $googleApi = new GoogleApi();
        $distancia = $googleApi->getDistanciaEmKm($_POST['origem'], $_POST['destino']);
        var_dump($distancia);
        if (!empty($distancia->error_message)) {
            $_SESSION["msg_texto"]=$distancia->error_message;
            $_SESSION["msg_tipo"]="warning";
            $this->loadTemplate('mensagens', $data);
            exit();
        }

        if ($_POST['origem'] == $_POST['destino']) {
            $_SESSION["msg_texto"] = "Não foi possível calcular, porque origem e destino estão iguais.";
            $_SESSION["msg_tipo"]="warning";
            header('Location: '.BASE_URL);
            exit();
        }

        $valorTipoCarro = $_POST['tipo'];

        $data['origem'] = $_POST['origem'];
        $data['destino'] = $_POST['destino'];
        $data['tipoCarro'] = TipoCarro::CARROS[$valorTipoCarro];

        $data['km'] = number_format($distancia->rows[0]->elements[0]->distance->value/1000, 2, ',', '.');
        $data['valorKm'] = number_format($valorTipoCarro, 2, ',', '.');
        $data['valorAluguel'] = str_replace('.', ',', $distancia->rows[0]->elements[0]->distance->value/1000*$valorTipoCarro);
        
        $this->loadTemplate('orcamento', $data);
    }

    
}