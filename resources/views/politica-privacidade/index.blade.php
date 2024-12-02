@extends('layouts.base')

@section('title', 'Política de Privacidade')

@section('content')
    <div class="container mt-4">
        <h1>Política de Privacidade</h1>
        <p>Última atualização: {{ date('d/m/Y') }}</p>

        <p>A sua privacidade é importante para nós. Esta política de privacidade descreve como coletamos, usamos e protegemos as informações que você fornece ao visitar nosso site.</p>

        <h2>1. Informações que coletamos</h2>
        <p>Podemos coletar os seguintes tipos de informações:</p>
        <ul>
            <li>Informações pessoais, como nome, endereço de e-mail, número de telefone, quando você as fornece voluntariamente.</li>
            <li>Informações de navegação, como endereço IP, tipo de navegador, páginas acessadas e tempo gasto no site, coletadas automaticamente.</li>
        </ul>

        <h2>2. Como usamos suas informações</h2>
        <p>As informações coletadas podem ser usadas para:</p>
        <ul>
            <li>Melhorar a experiência do usuário em nosso site.</li>
            <li>Responder a consultas ou solicitações feitas por você.</li>
            <li>Enviar comunicações relacionadas ao nosso site ou serviços, se você tiver consentido em recebê-las.</li>
            <li>Cumprir obrigações legais e regulatórias.</li>
        </ul>

        <h2>3. Compartilhamento de informações</h2>
        <p>Não vendemos, alugamos ou compartilhamos suas informações pessoais com terceiros, exceto quando:</p>
        <ul>
            <li>For necessário para o funcionamento do site ou a prestação de serviços (por exemplo, provedores de hospedagem).</li>
            <li>Exigido por lei ou ordem judicial.</li>
        </ul>

        <h2>4. Proteção das informações</h2>
        <p>Adotamos medidas de segurança apropriadas para proteger suas informações contra acesso não autorizado, alteração, divulgação ou destruição. No entanto, nenhuma transmissão de dados pela internet é totalmente segura, e não podemos garantir a segurança absoluta.</p>

        <h2>5. Cookies</h2>
        <p>Nosso site utiliza cookies para melhorar sua experiência de navegação. Você pode configurar seu navegador para rejeitar cookies, mas isso pode limitar algumas funcionalidades do site.</p>

        <h2>6. Direitos do usuário</h2>
        <p>Você tem o direito de acessar, corrigir ou excluir suas informações pessoais, bem como retirar seu consentimento para o processamento dessas informações. Para exercer esses direitos, entre em contato conosco.</p>

        <h2>7. Alterações nesta política</h2>
        <p>Podemos atualizar esta política de privacidade de tempos em tempos. Recomendamos que você revise esta página periodicamente para estar ciente de quaisquer alterações.</p>

        <h2>8. Contato</h2>
        <p>Se você tiver dúvidas ou preocupações sobre esta política de privacidade, entre em contato conosco:</p>
        <ul>
            <li>E-mail: suporte@exemplo.com</li>
            <li>Telefone: (00) 1234-5678</li>
        </ul>

        <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Voltar para a página inicial</a>
    </div>
@endsection