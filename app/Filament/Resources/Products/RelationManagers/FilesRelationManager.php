<?php

namespace App\Filament\Resources\Products\RelationManagers;

use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class FilesRelationManager extends RelationManager
{
    protected static string $relationship = 'files';

    protected static ?string $title = 'Product Files';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\FileUpload::make('file_path')
                    ->label('File')
                    ->disk('local') // Changed to private storage
                    ->directory('products/files')
                    ->required()
                    ->acceptedFileTypes(['application/zip', 'application/x-rar-compressed', 'application/pdf'])
                    ->maxSize(102400) // 100MB
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $filePath = Storage::disk('local')->path($state);
                            if (file_exists($filePath)) {
                                $fileSize = filesize($filePath);
                                $set('file_size_bytes', $fileSize);
                                $set('checksum_sha256', hash_file('sha256', $filePath));
                            }
                        }
                    }),

                Forms\Components\Select::make('file_type')
                    ->options([
                        'main' => 'Main File',
                        'preview' => 'Preview',
                        'extra' => 'Extra/Bonus',
                    ])
                    ->default('main')
                    ->required(),

                Forms\Components\TextInput::make('file_size_bytes')
                    ->label('File Size (bytes)')
                    ->numeric()
                    ->disabled()
                    ->dehydrated(),

                Forms\Components\TextInput::make('checksum_sha256')
                    ->label('SHA256 Checksum')
                    ->disabled()
                    ->dehydrated()
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('file_path')
            ->columns([
                Tables\Columns\TextColumn::make('file_type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'main' => 'success',
                        'preview' => 'info',
                        'extra' => 'warning',
                    }),

                Tables\Columns\TextColumn::make('file_path')
                    ->label('File')
                    ->limit(50)
                    ->searchable(),

                Tables\Columns\TextColumn::make('file_size_bytes')
                    ->label('Size')
                    ->formatStateUsing(fn ($state) => number_format($state / 1024 / 1024, 2) . ' MB')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('file_type')
                    ->options([
                        'main' => 'Main File',
                        'preview' => 'Preview',
                        'extra' => 'Extra/Bonus',
                    ]),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        // Calculate file size and checksum if not already set
                        if (isset($data['file_path']) && !isset($data['file_size_bytes'])) {
                            $filePath = Storage::disk('local')->path($data['file_path']);
                            if (file_exists($filePath)) {
                                $data['file_size_bytes'] = filesize($filePath);
                                $data['checksum_sha256'] = hash_file('sha256', $filePath);
                            }
                        }
                        return $data;
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->after(function ($record) {
                        // Delete file from storage
                        if (Storage::disk('local')->exists($record->file_path)) {
                            Storage::disk('local')->delete($record->file_path);
                        }
                    }),
                Tables\Actions\Action::make('download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(fn ($record) => Storage::disk('local')->download($record->file_path)),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->after(function ($records) {
                            foreach ($records as $record) {
                                if (Storage::disk('local')->exists($record->file_path)) {
                                    Storage::disk('local')->delete($record->file_path);
                                }
                            }
                        }),
                ]),
            ]);
    }
}
