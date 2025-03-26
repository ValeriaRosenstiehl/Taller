<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto 6</title>
</head>
<body>
    <h1>Punto 6</h1>
    <a href="menu.html">VOLVER AL MENU</a><br>
    <form method="post">
        <label for="preorder">Preorden (separados por comas):</label><br>
        <input type="text" id="preorder" name="preorder"><br><br>
        
        <label for="inorder">Inorden (separados por comas):</label><br>
        <input type="text" id="inorder" name="inorder"><br><br>
        
        <label for="postorder">Postorden (separados por comas):</label><br>
        <input type="text" id="postorder" name="postorder"><br><br>
        
        <input type="submit" value="Construir Árbol">
    </form>
    <?php
    class TreeNode {
        public $value;
        public $left;
        public $right;
        public function __construct($value) {
            $this->value = $value;
            $this->left = null;
            $this->right = null;
        }
    }
    function buildTreeFromPreIn($preorder, $inorder) {
        if (empty($preorder) || empty($inorder)) {
            return null;
        }
        // The first element in preorder is the root
        $rootValue = array_shift($preorder);
        $root = new TreeNode($rootValue);
        // Find the index of the root in inorder
        $inorderIndex = array_search($rootValue, $inorder);
        
        // Build left and right subtrees
        $root->left = buildTreeFromPreIn($preorder, array_slice($inorder, 0, $inorderIndex));
        $root->right = buildTreeFromPreIn($preorder, array_slice($inorder, $inorderIndex + 1));
        return $root;
    }
    function buildTreeFromPostIn($postorder, $inorder) {
        if (empty($postorder) || empty($inorder)) {
            return null;
        }
        // The last element in postorder is the root
        $rootValue = array_pop($postorder);
        $root = new TreeNode($rootValue);
        // Find the index of the root in inorder
        $inorderIndex = array_search($rootValue, $inorder);
        
        // Build right and left subtrees
        $root->right = buildTreeFromPostIn(array_slice($postorder, $inorderIndex), array_slice($inorder, $inorderIndex + 1));
        $root->left = buildTreeFromPostIn(array_slice($postorder, 0, $inorderIndex), array_slice($inorder, 0, $inorderIndex));
        return $root;
    }
    function printTree($node, $level = 0) {
        if ($node === null) {
            return;
        }
        printTree($node->right, $level + 1);
        echo str_repeat('&nbsp;', 4 * $level) . $node->value . "<br>";
        printTree($node->left, $level + 1);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $preorder = isset($_POST['preorder']) ? explode(',', $_POST['preorder']) : [];
        $inorder = isset($_POST['inorder']) ? explode(',', $_POST['inorder']) : [];
        $postorder = isset($_POST['postorder']) ? explode(',', $_POST['postorder']) : [];
        // Check if at least two traversals are provided
        if ((count($preorder) > 0 && count($inorder) > 0) || 
            (count($preorder) > 0 && count($postorder) > 0) || 
            (count($inorder) > 0 && count($postorder) > 0)) {
            // Build the tree using pre-order and in-order or post-order and in-order
            if (count($preorder) > 0 && count($inorder) > 0) {
                $tree = buildTreeFromPreIn($preorder, $inorder);
            } elseif (count($postorder) > 0 && count($inorder) > 0) {
                $tree = buildTreeFromPostIn($postorder, $inorder);
            } else {
                echo "<p>Se requiere al menos preorden y enorden o postorden y enorden.</p>";
                exit;
            }
            echo "<h2>Árbol Binario Construido:</h2>";
            printTree($tree);
        } else {
            echo "<p>Por favor, proporcione al menos dos recorridos.</p>";
        }
    }
    ?>
</body>
</html>