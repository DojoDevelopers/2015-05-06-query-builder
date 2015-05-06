# Dojo Query Builder

## Desafio

Criar uma classe ou biblioteca capaz de gerar SQL de consulta.

```
$builder = new XYZ('tabela');
$builder->select()
	->where('campo1', '=', 'valor1')
	->where('campo2', '=', 'valor2');
```

```
select * from tabela where campo1 = 'valor1' and campo2 = 'valor2'
```

## Melhorias

### Select com campos

```
$builder = new XYZ('tabela1');
$builder->select(['campo1', 'campo2'])
	->where('campo1', '=', 'valor1')
	->where('campo2', '=', 'valor2')
	->order('campo');
```

```
select campo1, campo2 from tabela where campo1 = 'valor1' and campo2 = 'valor2' orderby campo asc
```

### Order by

```
$builder = new XYZ('tabela1');
$builder->select()
	->where('campo1', '=', 'valor1')
	->where('campo2', '=', 'valor2')
	->order('campo');
```

```
select * from tabela where campo1 = 'valor1' and campo2 = 'valor2' orderby campo asc
```

### Limit

```
$builder = new XYZ('tabela1');
$builder->select()
	->where('campo1', '=', 'valor1')
	->where('campo2', '=', 'valor2')
	->order('campo', 'desc')
	->limit(5);
```

```
select * from tabela where campo1 = 'valor1' and campo2 = 'valor2' orderby campo desc limit 5
```


### Join

```
$builder = new XYZ('tabela1');
$builder->select()
	->join('tabela2', 'tabela1.campo1 = tabela2.campo2', ['tabela2.campo1', 'tabela2.campo2'])
	->where('campo1', '=', 'valor1')
	->where('campo2', '=', 'valor2')
	->order('campo')
	->limit(5);
```

```
select * from tabela1 where tabela1.campo1 = 'valor1' and tabela1.campo2 = 'valor2' join tabela2 on tabela1.campo1 = tabela2.campo2 orderby campo asc liimt 5
```

# Feedback

## Negativos:
	faltou criar testes de novos cenários **
	baby steps (faltou aplicar em alguns momentos) **
	baby step na estrutura de diretorios e classes do desafio

## Positivos:
	baby steps (evoluiu) **
	desafio **
	uso do Sublime
	implementação dos testes foi melhor
	introdução (phpunit.xml)

## Proximo MC:
	Mangi
