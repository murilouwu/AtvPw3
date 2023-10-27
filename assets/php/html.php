<?php
    require 'Connect.php';
    session_start();
    
    final class HtmlBased
    {
        function HeaderEcho($Title, $assets, $itemPlus) {
            $res = '
                <!DOCTYPE html>          
                <html lang="pt-br">
                <head>
            ';
        
            if (is_array($assets)) {
                foreach ($assets as $asset) {
                    $type = $asset[0];
                    $link = $asset[1];
                    $extra = isset($asset[2]) ? $asset[2] : null;
        
                    if ($type == 0) {
                        $res .= '<meta ' . $link . '>';
                    } elseif ($type == 1) {
                        $res .= '<link rel="stylesheet" type="text/css" href="' . $link . '"';
                        if ($extra !== null) {
                            $res .= ' ' . $extra;
                        }
                        $res .= '>';
                    } elseif ($type == 2) {
                        $res .= '<script src="' . $link . '"';
                        if ($extra !== null) {
                            $res .= ' ' . $extra;
                        }
                        $res .= '></script>';
                    }
                }
            }
        
            $res .= '
                    <link rel="shortcut icon" href="'.$itemPlus.'">
                    <title>'.$Title.'</title>
                </head>
            ';
        
            echo $res;
        }
        
        function foot(){
            $res = '
                </html>
            ';
            echo($res);
        }
        
        function mensage($txt){
            echo '<script>alert("'.$txt.'");</script>';
        }

        function Atalho($pag) {
            header("Location: $pag");
            exit();
        }

        function Cripto($Pala){
            return password_hash($Pala, PASSWORD_BCRYPT);
        }   
        
        function CriptoVer($Pass, $Hash){
            return password_verify($Pass, $Hash);
        }

        function upload($file, $pastSave, $NewName){
            if ($file['error'] === 0) {
                $nome_arquivo = $pastSave . $NewName;

                if (move_uploaded_file($file['tmp_name'], $nome_arquivo)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return 'Erro no upload: ' . $file['error'];
            }
        }
    }

    final class BankUse
    {
        public $NameTable;
        public $Dates;

        function InsertUser($pdo, $Vls, $Vers, $Configs)
        {
            $VersToText = '';
            foreach ($Vers as $key => $ver) {
                if ($key === 0) {
                    $VersToText .= $this->Dates[$ver].'= :'.$this->Dates[$ver];
                } else {
                    $VersToText .= ' '. $Configs[0][$key - 1].' '.$this->Dates[$ver].'= :'.$this->Dates[$ver];
                }
            }

            $sql = "SELECT * FROM ".$this->NameTable." WHERE ".$VersToText;
            $stmt = $pdo->prepare($sql);
            foreach($Vers as $key => $ver){
                $dateParam = ':'.$this->Dates[$ver];
                $stmt->bindParam($dateParam, $Vls[$ver]);
            }
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return "cadastrado já existe, >:(";
            }else{
                try {
                    $DtsToText = implode(', ', $this->Dates);
                    $VlsToText = '';
                    foreach($Vls as $key => $vl){
                        $valueParam = ':'.$this->Dates[$key];

                        if($key === (count($Vls) - 1)){
                            $VlsToText .= $valueParam;
                        }else{
                            $VlsToText .= $valueParam.', ';
                        }
                    }

                    $sql = "INSERT INTO ".$this->NameTable." (".$DtsToText.") VALUES (".$VlsToText.")";
                    $stmt = $pdo->prepare($sql);
                    foreach($Vls as $key => $vl){
                        $dateParam = ':'.$this->Dates[$key];
                        $stmt->bindParam($dateParam, $Vls[$key]);
                    }
                    if ($stmt->execute()) {
                        return 'sucesso';
                    } else {
                        throw new Exception('Erro ao cadastrar ;-;');
                    }
                } catch (PDOException $e) {
                    return "Error: " . $e->getMessage();
                }
            }
        }

        function GetUser($pdo, $DateRequire, $Where){
            if($DateRequire == ""){
                $DateRequire = "*";
            }
            try{
                $sql = "SELECT ".$DateRequire." FROM ".$this->NameTable." ".$Where;
                $stmt = $pdo->prepare($sql);
                if($stmt->execute()){
                    if($stmt->rowCount() > 0){
                        return $stmt;    
                    }else{
                        return 'Não Encontrado';
                    }
                }else{
                    throw new Exception('Erro');
                }
            } catch(PDOException $e){
                return 'Error: '.$e->getMessage();
            }
        }

        function UpdateUser($pdo, $UpdateData, $Values, $Where){
            $Updates = '';
            foreach ($UpdateData as $key => $column) {
                if ($key === 0) {
                    $Updates .= $column . ' = :' . $column;
                } else {
                    $Updates .= ', ' . $column . ' = :' . $column;
                }
            }

            $sql = "UPDATE " . $this->NameTable . " SET " . $Updates . " WHERE " . $Where;
            $stmt = $pdo->prepare($sql);

            foreach ($UpdateData as $column) {
                $param = ':' . $column;
                $value = $Values[$column];
                $stmt->bindParam($param, $value);
            }

            if ($stmt->execute()) {
                return 'sucesso.';
            } else {
                throw new Exception('Erro ao atualizar os dados.');
            }
        }



    }
?>