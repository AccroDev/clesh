<?php

namespace Controllers;

use Models\Getter;
use Models\Mutateur;
use Models\Setter;

class VisualEditorController
{

    public function showPreview()
    {

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (isset($data['_name'])) {
            return $this->renderTemplate($data);
        }

        if (is_array($data)) {
            ob_start();
            foreach ($data as $block) {
                $this->renderTemplate($block);
            }
            $content = ob_get_clean();
            $isPreview = true;
            require_once __DIR__ . '/../Views/layout.php';
        }
    }

    private function renderTemplate($block)
    {
        $template = $block['_name'] ?? null;
        if ($template) {
            $path = __DIR__ . "/../Views/template/components/{$template}.php";
            if (file_exists($path)) {
                extract($block);
                require $path;
            } else {
                echo "";
            }
        }
    }
    public function createpage()
    {
        // 1. Récupération des données JSON envoyées par fetch
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (!$data) {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Données invalides']);
            exit;
        }

        // 2. Préparation du chemin final (Slug + Groupe)
        // Si un groupe est sélectionné, on préfixe la route : /article/mon-slug
        $prefix = !empty($data['parent_group']) ? trim($data['parent_group'], '/') . '/' : '';
        $finalRoute = $prefix . trim($data['route'], '/');

        // 3. Préparation des données pour la table "pages"
        // On mappe les champs reçus aux colonnes de ta base de données
        $payload = [
            'structure_type' => $data['structure_type'],
            'titre'          => $data['title'],
            "path"           =>  $finalRoute,
            'accreditation'  => 1,
            'contenue'       => json_encode([]),
            'autheur'        => $_SESSION['user_id'] ?? 1,
            'date'           => date('Y-m-d H:i:s'),
            'description'    => $data['description']
        ];

        $success = Setter::insert('pages', $payload);

        header('Content-Type: application/json');
        if ($success) {
            echo json_encode([
                'success' => true,
                'redirect' => '/admin'
            ]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Erreur lors de l’enregistrement en base de données']);
        }
        exit;
    }


    public function dynamic($name, $params)
    {
        $url = $params['url'] ?? '';

        // 1. Chercher la page dans la table "pages" par la route (accreditation)
        $page = Getter::get('pages', ['path' => $url]);

        if (!$page) {
            header("HTTP/1.0 404 Not Found");
            echo "Page non trouvée";
            exit;
        }

        // 2. Décoder le contenu JSON (les blocs de l'éditeur)
        $blocks = json_decode($page['contenue'], true) ?: [];

        // 3. Rendre les blocs un par un (Bufferisation)
        ob_start();
        foreach ($blocks as $block) {
            $this->renderTemplate($block);
        }
        $title = $page['titre'];
        $page_id = $page["id"];
        $content = ob_get_clean();

        // 4. Charger le layout final
        require("Views/layout.php");
    }

    public function getContent()
    {
        if (!isset($_GET["id"])) {
            echo json_encode([
                "statut" => false,
                "message" => "id introuvable"
            ]);
            return;
        };

        $page = Getter::get("pages", ["id" => $_GET["id"]]);

        if ($page) {
            echo json_encode([
                "contenue" => $page["contenue"]
            ]);
            return;
        }

        echo json_encode([
            "statut" => false,
            "message" => "id introuvable"
        ]);
    }

    public function UpdatePage()
    {
        // 1. Récupération du flux JSON
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (!$data || !isset($data['pageId']) || !isset($data['content'])) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Données incomplètes']);
            exit;
        }

        $success = Mutateur::update("pages", [
            'contenue' => $data['content'] 
        ], [
            'id' => $data['pageId']
        ]);

        header('Content-Type: application/json');
        echo json_encode(['success' => $success]);
        exit;
    }
}
