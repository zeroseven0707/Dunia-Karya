<?php

namespace App\Filament\Widgets;

use App\Models\Download;
use App\Models\ProductFile;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class DownloadReportWidget extends BaseWidget
{
    protected static ?int $sort = 4;
    
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Download::query()
                    ->with(['user', 'productFile.product'])
                    ->latest()
            )
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('productFile.product.title')
                    ->label('Product')
                    ->searchable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('productFile.file_type')
                    ->label('File Type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'main' => 'success',
                        'preview' => 'info',
                        'extra' => 'warning',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP Address')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Downloaded At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('file_type')
                    ->label('File Type')
                    ->options([
                        'main' => 'Main',
                        'preview' => 'Preview',
                        'extra' => 'Extra',
                    ])
                    ->query(function ($query, $state) {
                        if ($state['value']) {
                            return $query->whereHas('productFile', function ($q) use ($state) {
                                $q->where('file_type', $state['value']);
                            });
                        }
                    }),
                
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        \Filament\Forms\Components\DatePicker::make('from'),
                        \Filament\Forms\Components\DatePicker::make('until'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['from'], fn ($q, $date) => $q->whereDate('created_at', '>=', $date))
                            ->when($data['until'], fn ($q, $date) => $q->whereDate('created_at', '<=', $date));
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->paginated([10, 25, 50, 100]);
    }
}
