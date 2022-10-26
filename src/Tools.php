<?php
namespace NFHub\SpedNfe;

use Exception;
use NFHub\Common\Tools as ToolsBase;

/**
 * Classe Tools
 *
 * Classe responsável pela implementação com a API de SpedNfe do NFHub
 *
 * @category  NFHub
 * @package   NFHub\SpedNfe\Tools
 * @author    Jefferson Moreira <jeematheus at gmail dot com>
 * @copyright 2021 NFSERVICE
 * @license   https://opensource.org/licenses/MIT MIT
 */
class Tools extends ToolsBase
{
    /**
     * Cadastra um novo certificado digital
     */
    function cadastraCertificado(string $company_cnpj, array $data, array $params = []): array
    {
        try {
            $this->setUpload(true);
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $response = $this->post('certificates', $data, $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        } finally {
            $this->setUpload(false);
        }
    }

    /**
     * Calcula os totais de uma NFe
     */
    function calculaNfe(string $company_cnpj, array $data, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $response = $this->post('/invoices/calculate', $data, $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Transmite uma NFe
     */
    function transmiteNfe(string $company_cnpj, array $data, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $response = $this->post('/invoices', $data, $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Consulta uma NFe
     */
    function consultaNfe(string $company_cnpj, int $id, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $response = $this->get("/invoices/$id", $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Busca a DANFE de uma NFe
     */
    function imprimeNfe(string $company_cnpj, int $id, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $this->setDecode(false);
            $response = $this->get("/invoices/$id/danfe", $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Busca o XML de uma NFe
     */
    function xmlNfe(string $company_cnpj, int $id, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $this->setDecode(false);
            $response = $this->get("/invoices/$id/xml", $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Realiza a correção de uma NFe
     */
    function cceNfe(string $company_cnpj, int $id, array $data, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $response = $this->post("/invoices/$id/cce", $data, $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Busca o PDF de uma Correção de NFe
     */
    function imprimeNfeCce(string $company_cnpj, int $id, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $this->setDecode(false);
            $response = $this->get("/invoices/$id/cce/pdf", $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }


    /**
     * Realiza a correção de uma NFe
     */
    function cancelNfe(string $company_cnpj, int $id, array $data, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $response = $this->post("/invoices/$id/cancel", $data, $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Busca o PDF de uma Correção de NFe
     */
    function imprimeNfeCancel(string $company_cnpj, int $id, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $this->setDecode(false);
            $response = $this->get("/invoices/$id/cancel/pdf", $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Realiza a importação de xmls
     *
     * @param string $company_cnpj CNPJ da empresa que esta realizando a importação
     * @param array $xmls Array contendo os arquivos XMLs importados pela classe CURLFile
     *
     * @access public
     * @return array
     */
    function importaXml(string $company_cnpj, array $xmls, array $params  = []) :array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            if (empty($xmls)) {
                throw new Exception("É necessário enviar ao menos 1(um) arquivo XML", 1);
            }

            $data['xmls'] = $xmls;

            $this->setUpload(true);
            $response = $this->post("/invoices/import", $data, $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Gera o PDF de uma NFe com base no conteúdo de seu arquivo XML
     *
     * @param string $company_cnpj CNPJ da empresa que está gerando o PDF
     * @param string $content Conteúdo do arquivo XML em base64
     * @param array $param Parametros adicionais para a requisição
     *
     * @access public
     * @return array
     */
    public function geraPdf(string $company_cnpj, string $content, array $params = []) :array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $data = [
                'xml' => $content
            ];

            $this->setDecode(false);
            $response = $this->post("/tools/printSefaz", $data, $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Gera a Pré Danfe de uma NFe com base em seus dados
     *
     * @param string $company_cnpj CNPJ da empresa que está gerando a pré danfe
     * @param array $response Dados da nota fiscal
     * @param array $param Parametros adicionais para a requisição
     */
    public function imprimePreDanfe(string $company_cnpj, array $response, array $params = []) :array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $this->setDecode(false);

            $response = $this->post("/invoices/preDanfe", $response, $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Inutiliza uma faixa de números de uma série fiscal de NFe
     */
    function inutilizaNfe(string $company_cnpj, array $data, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $response = $this->post('/invoices/disablement', $data, $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Cadastra/Atualiza série fiscal da empresa
     *
     * @param string $company_cnpj CNPJ da empresa
     * @param int $company_id ID da empresa no NFHub
     * @param array $dados Dados da série fiscal a ser cadastrada/atualizada
     * @param array $params Parametros adicionais aceitos pela requisição
     */
    function cadastraSerieFiscal(string $company_cnpj, int $company_id, array $data, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $response = $this->post("/companies/$company_id/series", $data, $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Consulta as séries fiscais da empresa
     *
     * @param string $company_cnpj CNPJ da empresa
     * @param int $company_id ID da empresa no NFHub
     * @param int $serie Série Fiscal
     * @param array $params Parametros adicionais aceitos pela requisição
     */
    function consultaSerieFiscal(string $company_cnpj, int $company_id, int $type, int $serie, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $params = array_filter($params, function($item) {
                return !in_array($item['type'], ['serie']);
            }, ARRAY_FILTER_USE_BOTH);

            if (!empty($type)) {
                $params[] = [
                    'name' => 'type',
                    'value' => $type
                ];
            }

            if (!empty($serie)) {
                $params[] = [
                    'name' => 'serie',
                    'value' => $serie
                ];
            }

            $response = $this->get("/companies/$company_id/series", $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }

    /**
     * Exclui a série fiscal da empresa
     *
     * @param string $company_cnpj CNPJ da empresa
     * @param int $company_id ID da empresa no NFHub
     * @param int $serie_id ID da serie no NFHub
     * @param array $params Parametros adicionais aceitos pela requisição
     */
    function removeSerieFiscal(string $company_cnpj, int $company_id, int $serie_id, array $params = []): array
    {
        try {
            $headers = [
                "company-cnpj: $company_cnpj"
            ];

            $response = $this->delete("/companies/$company_id/series/$serie_id", $params, $headers);

            if ($response['httpCode'] >= 200 || $response['httpCode'] <= 299) {
                return $response;
            }

            if (isset($response['body']->message)) {
                throw new Exception($response['body']->message, 1);
            }

            if (isset($response['body']->errors)) {
                throw new Exception(implode("\r\n", $response['body']->errors), 1);
            }

            throw new Exception(json_encode($response), 1);
        } catch (Exception $e) {
            throw new Exception($e, 1);
        }
    }
}
