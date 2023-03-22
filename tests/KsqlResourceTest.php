<?php

use ZiffMedia\LaravelKsql\KsqlResource;

test('it should produce correct stream queries from table names', function () {
    $kr = new class extends KsqlResource
    {
        public string $ksqlTable = 'test';
    };
    expect($kr->getKsqlStreamQuery())->toBe('SELECT * FROM test EMIT CHANGES;');
});

test('it should produce correct stream queries from overridden function', function () {
    $kr = new class extends KsqlResource
    {
        public function getKsqlStreamQuery(): string
        {
            return 'test';
        }
    };
    expect($kr->getKsqlStreamQuery())->toBe('test');
});

test('it should throw exceptions when impossible to produce stream queries', function () {
    $kr = new class extends KsqlResource
    {
    };
    expect($kr->getKsqlStreamQuery(...))->toThrow(Error::class);
});

test('it should produce correct fill queries from table names', function () {
    $kr = new class extends KsqlResource
    {
        public string $ksqlTable = 'test';
    };
    expect($kr->getKsqlFillQuery())->toBe('SELECT * FROM test;');
});

test('it should produce correct fill queries from overridden function', function () {
    $kr = new class extends KsqlResource
    {
        public function getKsqlFillQuery(): string
        {
            return 'test';
        }
    };
    expect($kr->getKsqlFillQuery())->toBe('test');
});

test('it should throw exceptions when impossible to produce fill queries', function () {
    $kr = new class extends KsqlResource
    {
    };
    expect($kr->getKsqlFillQuery(...))->toThrow(Error::class);
});

test('it should produce correct catchup queries from table names', function () {
    $kr = new class extends KsqlResource
    {
        public string $ksqlTable = 'test';

        public string $model = TestModel::class;
    };
    expect($kr->getCatchupQuery())->toBe('SELECT * FROM test WHERE updated_at >= \'2023-01-01T11:55:00+00:00\'');
});

test('it should produce correct catchup queries from overridden function', function () {
    $kr = new class extends KsqlResource
    {
        public function getCatchupQuery(): string
        {
            return 'test';
        }
    };
    expect($kr->getCatchupQuery())->toBe('test');
});

test('it should throw exceptions when impossible to produce catchup queries', function () {
    $kr = new class extends KsqlResource
    {
    };
    expect($kr->getCatchupQuery(...))->toThrow(Error::class);
});

test('it should generate correct event names', function () {
    $kr = new KsqlResource();
    expect($kr->getEventName())->toBe('ksql.ksql_resource');
});
