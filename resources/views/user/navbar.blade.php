<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link @if($title == 'Dashboard') active @endif" aria-current="page" href="{{ route('user.dashboard') }}">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($title == 'Income' || $title == 'Search Income' || $title == 'Monthly Income' || $title == 'Yearly Income') active @endif" href="{{ route('user.income') }}">Income</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($title == 'Expenses' || $title == 'Search Expenses' || $title == 'Monthly Expenses' || $title == 'Yearly Expenses') active @endif" href="{{ route('user.expense') }}">Expenses</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($title == 'Loan') active @endif" href="{{ route('user.loan') }}">Loan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($title == 'Owed') active @endif" href="{{ route('user.owed') }}">Owed</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($title == 'Pay-Plan') active @endif" href="{{ route('user.payplan') }}">Pay Plan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($title == 'Report') active @endif" href="{{ route('user.report') }}">Report</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($title == 'About') active @endif" href="{{ route('about') }}">About</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if($title == 'Contact') active @endif" href="{{ route('contact') }}">Contact</a>
    </li>
</ul>