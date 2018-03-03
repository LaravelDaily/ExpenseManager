<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'expense-management' => [		'title' => 'Expense Management',		'fields' => [		],	],
		'expense-category' => [		'title' => 'Expense Categories',		'fields' => [			'name' => 'Name',			'created-by' => 'Created by',		],	],
		'income-category' => [		'title' => 'Income categories',		'fields' => [			'name' => 'Name',			'created-by' => 'Created by',		],	],
		'income' => [		'title' => 'Income',		'fields' => [			'income-category' => 'Income Category',			'entry-date' => 'Entry date',			'amount' => 'Amount',			'created-by' => 'Created by',		],	],
		'expense' => [		'title' => 'Expenses',		'fields' => [			'expense-category' => 'Expense Category',			'entry-date' => 'Entry date',			'amount' => 'Amount',			'created-by' => 'Created by',		],	],
		'monthly-report' => [		'title' => 'Monthly report',		'fields' => [		],	],
		'currency' => [		'title' => 'Currency',		'fields' => [			'title' => 'Title',			'symbol' => 'Symbol',			'money-format' => 'Money format',			'created-by' => 'Created by',		],	],
	'quickadmin_title' => 'Laravel Expense Manager',
];